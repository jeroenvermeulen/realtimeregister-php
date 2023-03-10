<?php declare(strict_types = 1);

namespace SandwaveIo\RealtimeRegister\Domain;

final class TLDInfo implements DomainObjectInterface
{
    public string $provider;

    /** @var array<string> */
    public array $applicableFor;

    public TLDMetaData $metadata;

    private function __construct(
        string $provider,
        array $applicableFor,
        TLDMetaData $metadata
    ) {
        $this->provider = $provider;
        $this->applicableFor = $applicableFor;
        $this->metadata = $metadata;
    }

    public static function fromArray(array $data): TLDInfo
    {
        return new TLDInfo(
            $data['provider'],
            $data['applicableFor'],
            TLDMetaData::fromArray($data['metadata'])
        );
    }

    public function toArray(): array
    {
        return [
            'provider' => $this->provider,
            'applicableFor' => $this->applicableFor,
            'metadata' => $this->metadata->toArray(),
        ];
    }
}
