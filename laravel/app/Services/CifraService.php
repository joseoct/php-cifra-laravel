<?php

namespace App\Services;

use App\Models\Cifra;
use Illuminate\Support\Facades\DB;
use Auth;

class CifraService
{
    public function __construct(Cifra $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $resource = $this->model->create($data);

            $resource->user()->sync([Auth::id()]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }

        return $resource;
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $resource = $this->model->findOrFail($id);
            $resource->update($data);

            $resource->user()->sync([Auth::id()]);
            
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $resource;
    }

    public function destroy($id)
    {
        try {
            $resource = $this->model->findOrFail($id);
            $resource->delete();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
