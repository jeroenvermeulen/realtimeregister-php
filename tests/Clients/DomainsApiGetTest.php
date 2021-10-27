<?php declare(strict_types = 1);

namespace SandwaveIo\RealtimeRegister\Tests\Clients;

use PHPUnit\Framework\TestCase;
use SandwaveIo\RealtimeRegister\Domain\DomainDetails;
use SandwaveIo\RealtimeRegister\Tests\Helpers\MockedClientFactory;

class DomainsApiGetTest extends TestCase
{
    public function test_get(): void
    {
        $validDomainDetails = include __DIR__ . '/../Domain/data/domain_details_valid.php';
        $sdk = MockedClientFactory::makeSdk(
            200,
            json_encode($validDomainDetails),
            MockedClientFactory::assertRoute('GET', 'v2/domains/example.com', $this)
        );

        $response = $sdk->domains->get('example.com');

        $this->assertInstanceOf(DomainDetails::class, $response);
        $this->assertSame($validDomainDetails, $response->toArray());
    }
}
