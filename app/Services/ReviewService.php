<?php
namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function createReview($data)
    {
        return $this->reviewRepository->create($data);
    }

    public function getReviewsForProduct($productId)
    {
        return $this->reviewRepository->getByProductId($productId);
    }
}
