<?php

namespace App\Interfaces;

interface ChamadoRepositoryInterface
{
    public function getChamados();
    public function getChamado($id);
    public function createChamado($data);
    public function updateChamado($data, $id);
    public function deleteChamado($id);
}
