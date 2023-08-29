<?php

namespace App\Traits;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Request as RequestFacade;

trait DataTransformer
{
    /**
     * @param $item
     * @param TransformerAbstract $transformer
     * @param string $includes
     *
     * @return array|null
    */
    public function buildItem($item, TransformerAbstract $transformer, string $includes = ''): ?array
    {
        return $this->transformData(new Item($item, $transformer));
    }

    /**
     * @param $item
     * @param Closure|TransformerAbstract $transformer
     * @param string $includes
     *
     * @return array|null
     */
    public function buildCollection($item, Closure|TransformerAbstract $transformer, string $includes = ''): ?array
    {
        $resource = new Collection($item, $transformer);
        if ($item instanceof LengthAwarePaginator)
        {
            $resource->setPaginator(new IlluminatePaginatorAdapter($item->appends($_GET)));
        }

        return $this->transformData($resource, $includes);
    }

    /**
     * @param Builder $builder
     * @param TransformerAbstract $transformer
     *
     * @return array|null
    */
    public function getCollection(Builder $builder, TransformerAbstract $transformer): ?array
    {
        RequestFacade::validate(['limit' => 'sometimes|max:100']);
        $limit = RequestFacade::get('limit', 25);
        $currentPage = RequestFacade::get('current_page');

        return $this->buildCollection($builder->paginate($limit, ['*'], 'page', $currentPage), $transformer);
    }

    /**
     * @param ResourceAbstract $resource
     * @param string $includes
     *
     * @return array|null
    */
    public function transformData(ResourceAbstract $resource, string $includes = ''): ?array
    {
        $manager = new Manager();
        if (empty($includes)) {
            $includes = explode(',', request('includes', ''));
        }

        if ($includes) {
            $manager->parseIncludes($includes);
        }

        return $manager->createData($resource)->toArray();
    }

    /**
     * @param array $data
     * @param Request $request
     * @param array $whitelist
     *
     * @return array
     */
    public function sanitizePostToRequest(array $data, Request $request, array $whitelist = ['reference']): array
    {
        $expectedData = array_keys($request->rules());
        foreach ($data as $key => $val)
        {
            if (!in_array($key, $whitelist))
            {
                if (!in_array($key, $expectedData))
                {
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }
}
