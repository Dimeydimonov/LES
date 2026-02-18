<?php

namespace App\Traits;

trait PaginationTrait
{
    private const PAGINATION_RANGE = 2;

    protected function paginate($query, int $page, int $perPage, string $baseUrl): array
    {
        $total = $query->count();
        $lastPage = (int) ceil($total / $perPage);
        
        $items = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        $pagination = [
            'current_page' => $page,
            'last_page' => $lastPage,
            'per_page' => $perPage,
            'total' => $total,
            'from' => $total > 0 ? ($page - 1) * $perPage + 1 : 0,
            'to' => min($page * $perPage, $total),
            'base_url' => $baseUrl,
            'first_page_url' => $baseUrl,
            'last_page_url' => $baseUrl . '?page=' . $lastPage,
            'next_page_url' => $page < $lastPage ? $baseUrl . '?page=' . ($page + 1) : null,
            'prev_page_url' => $page > 1 ? $baseUrl . '?page=' . ($page - 1) : null,
            'page_range' => $this->generatePageRange($page, $lastPage),
        ];

        return [
            'items' => $items,
            'pagination' => $pagination
        ];
    }

    protected function generatePageRange(int $currentPage, int $lastPage): array
    {
        $range = [];
        $start = max(1, $currentPage - self::PAGINATION_RANGE);
        $end = min($lastPage, $currentPage + self::PAGINATION_RANGE);

        for ($i = $start; $i <= $end; $i++) {
            $range[] = $i;
        }

        return $range;
    }
}
