<?php

namespace Tests\Feature\Admin;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_partner_index_page_can_be_opened(): void
    {
        $response = $this->get(route('admin.partners.index'));

        $response->assertOk();
    }

    public function test_partner_can_be_created_updated_and_deleted(): void
    {
        $createResponse = $this->post(route('admin.partners.store'), [
            'name' => 'Partner A',
            'logo_url' => 'https://example.com/logo-a.png',
        ]);

        $createResponse->assertRedirect(route('admin.partners.index'));
        $this->assertDatabaseHas('partners', [
            'name' => 'Partner A',
            'logo_url' => 'https://example.com/logo-a.png',
        ]);

        $partner = Partner::firstOrFail();

        $updateResponse = $this->put(route('admin.partners.update', $partner), [
            'name' => 'Partner B',
            'logo_url' => 'https://example.com/logo-b.png',
        ]);

        $updateResponse->assertRedirect(route('admin.partners.index'));
        $this->assertDatabaseHas('partners', [
            'id' => $partner->id,
            'name' => 'Partner B',
            'logo_url' => 'https://example.com/logo-b.png',
        ]);

        $deleteResponse = $this->delete(route('admin.partners.destroy', $partner));

        $deleteResponse->assertRedirect(route('admin.partners.index'));
        $this->assertDatabaseMissing('partners', [
            'id' => $partner->id,
        ]);
    }
}
