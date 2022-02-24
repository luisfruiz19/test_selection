<?php

namespace Tests\Feature;

use App\Models\Article as Product;
use App\Models\User as Author;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private function createProductActive(): Product
    {
        return Product::factory()->create(['state' => Product::STATE_ACTIVE]);
    }

    private function createProductInactive(): Product
    {
        return Product::factory()->create(['state' => Product::STATE_INACTIVE]);
    }

    private function createAuthorActive(): Author
    {
        return Author::factory()->create(['state' => Author::STATE_ACTIVE]);
    }

    private function createAuthorInactive(): Author
    {
        return Author::factory()->create(['state' => Author::STATE_INACTIVE]);
    }


    public function testGetListOfArticlesAndAuthorsWithStateActive()
    {
        $productActive = $this->createProductActive();

        $productInactive = $this->createProductInactive();

        $authorActive = $this->createAuthorActive();

        $authorInactive = $this->createAuthorInactive();

        $response = $this->get(route('articles.index'));

        $response->assertOk();

        $response->assertViewIs('products');

        $this->verifyContentView($response, 'products', $productActive, $productInactive);

        $this->verifyContentView($response, 'authors', $authorActive, $authorInactive);
    }

    public function testCreateArticle()
    {
        $author = $this->createAuthorActive();

        $response = $this->from(route('articles.index'))
            ->post(route('articles.store'), [
                'user_id' => $author->id,
                'title' => 'Aceite',
                'description' => 'Aceite de 500 ml en tamaño de botella.',
                'state' => Product::STATE_ACTIVE,
            ])
            ->assertStatus(302)
            ->assertRedirect(route('articles.index'));

        $response->assertSessionHas(['success' => 'Se creo correctamente el articulo Aceite']);

        $this->assertDatabaseHas('articles', [
            'user_id' => $author->id,
            'title' => 'Aceite',
            'description' => 'Aceite de 500 ml en tamaño de botella.',
            'state' => Product::STATE_ACTIVE,
        ]);
    }

    public function testUpdateArticle()
    {
        $article = $this->createProductActive();

        $author = $this->createAuthorActive();

        $response = $this->from(route('articles.index'))
            ->put(route('articles.update', $article->id), [
                'user_id' => $author->id,
                'title' => 'Aceite Modificado',
                'description' => 'Descripcion modificada',
                'state' => Product::STATE_INACTIVE,
            ])
            ->assertStatus(302)
            ->assertRedirect(route('articles.index'));

        $response->assertSessionHas(['success' => 'Se actualizo correctamente el articulo Aceite Modificado']);

        $this->assertDatabaseHas('articles', [
            'user_id' => $author->id,
            'title' => 'Aceite Modificado',
            'description' => 'Descripcion modificada',
            'state' => Product::STATE_INACTIVE,
        ]);
    }

    public function testDestroyArticle()
    {
        $article = $this->createProductActive();

        $response = $this->from(route('articles.index'))
                    ->delete(route('articles.destroy',$article->id))
                    ->assertStatus(302)
                    ->assertRedirect(route('articles.index'));

        $response->assertSessionHas(['success' => 'Se eliminó correctamente el articulo']);

        $this->assertDatabaseCount('articles', 0);
    }


    private function verifyContentView(TestResponse $response, $nameViewHas, $argumentOne, $argumentTwo): TestResponse
    {
        return $response->assertViewHas(
            $nameViewHas,
            function (Collection $collection) use ($argumentOne, $argumentTwo) {
                return $collection->contains($argumentOne) && !$collection->contains($argumentTwo);
            }
        );
    }
}
