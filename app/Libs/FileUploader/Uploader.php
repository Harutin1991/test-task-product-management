<?php

namespace App\Libs\FileUploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Class Uploader
 * @package Uploader
 */
class Uploader
{
    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $storageDisk;

    /**
     * @var string
     */
    protected $storagePath;

    /**
     * @var array
     */
    protected $storageDisks = [];

    /**
     * BaseUploader constructor.
     */
    public function __construct()
    {
        $this->storageDisks = config('uploader.storageDisks');
        $this->storageDisk = config('uploader.disk');
        $this->storagePath = config('uploader.default_path');
    }

    /**
     * @param string $name
     * @return Uploader
     */
    public function setFileName(string $name): self
    {
        $this->fileName = $name;
        return $this;
    }

    /**
     * @param string $diskName
     * @return $this
     */
    public function setDisk(string $diskName): self
    {
        $this->storageDisk = $diskName;
        return $this;
    }

    /**
     * @param $diskKey
     * @return $this
     */
    public function setDiskKey($diskKey): self
    {
        $this->storageDisk = $this->storageDisks[$diskKey];
        return $this;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setStoragePath(string $path): self
    {
        $path = str_replace(['.', '/'], DIRECTORY_SEPARATOR, $path);
        $this->storagePath = $path;
        $this->makePath();
        return $this;
    }

    /**
     * @param UploadedFile $file
     * @return array
     * @throws \Exception
     */
    public function upload(UploadedFile $file): array
    {
        $this->file = $file;

        if (!$this->fileName) {
            $this->fileName = $this->generateFileName();
        }

        return $this->fileUploadedResponse($this->store());
    }

    /**
     * @param string|null $fileName
     * @return bool
     */
    public function delete(?string $fileName = null): bool
    {
        $this->fileName = $fileName ?? $this->fileName;
        $storage = Storage::disk($this->storageDisk);

        $path = $this->storagePath . DIRECTORY_SEPARATOR . $this->fileName;
        if ($storage->exists($path)) {
            return $storage->delete($path);
        }

        return false;
    }

    /**
     * @return false|string
     * @throws \Exception
     */
    protected function store()
    {
        $options = [
            'disk' => $this->storageDisk
        ];

        $result = $this->file->storeAs(
            $this->storagePath,
            $this->fileName,
            $options
        );

        if (!$result) {
            throw new \Exception('Failed to upload file');
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function generateFileName(): string
    {
        $extension = $this->file->getClientOriginalExtension();

        return md5(Str::random(20)) . '.' . $extension;
    }

    /**
     * @param string $filePath
     * @return array
     */
    protected function fileUploadedResponse(string $filePath): array
    {
        $root = config("filesystems.disks.$this->storageDisk.root");

        $fullPath = $root . DIRECTORY_SEPARATOR . $filePath;

        return [
            'path' => $fullPath,
            'name' => $this->fileName,
            'storagePath' => $this->storagePath,
            'mimeType' => $this->file->getMimeType(),
            'size' => $this->file->getSize(),
            'originalName' => $this->file->getClientOriginalName(),
            'url' => Storage::disk($this->storageDisk)->url($filePath)
        ];
    }

    /**
     *
     */
    protected function makePath(): void
    {
        if (in_array($this->storageDisk, ['local', 'public'])) {
            Storage::disk($this->storageDisk)->makeDirectory($this->storagePath);
        }
    }
}
