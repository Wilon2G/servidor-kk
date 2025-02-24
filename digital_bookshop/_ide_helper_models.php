<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $ISBN
 * @property string $title
 * @property string $author
 * @property int $stock
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BorrowedBook> $borrowedBooks
 * @property-read int|null $borrowed_books_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sale> $sales
 * @property-read int|null $sales_count
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereISBN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $book_id
 * @property int $sale_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @property-read \App\Models\Sale $sale
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookSale whereUpdatedAt($value)
 */
	class BookSale extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $book_id
 * @property int $customer_id
 * @property string $rentedAt
 * @property string $dueTo
 * @property string|null $returnedAt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @property-read \App\Models\Customer $customer
 * @method static \Database\Factories\BorrowedBookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereDueTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereRentedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereReturnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook whereUpdatedAt($value)
 */
	class BorrowedBook extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $firstname
 * @property string $surname
 * @property string $email
 * @property mixed $password
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $borrowedBooks
 * @property-read int|null $borrowed_books_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sale> $sales
 * @property-read int|null $sales_count
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $customer_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @property-read \App\Models\Customer $customer
 * @method static \Database\Factories\SaleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 */
	class Sale extends \Eloquent {}
}

