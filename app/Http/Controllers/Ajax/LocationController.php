<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoriesInterface as DistrictRepositoriesInterface;
use App\Repositories\Interfaces\ProviceRepositoriesInterface as ProviceRepositoriesInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Fetch locations based on some criteria.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected $districtRepository;
    public function __construct(
        DistrictRepositoriesInterface $districtRepository,
        ProviceRepositoriesInterface $proviceRepository
    ){
        $this->districtRepository = $districtRepository;
        $this->proviceRepository = $proviceRepository;
    }
    public function getLocation(Request $request)
{
    $get = $request->input();
    $html = '';

    if($get['target'] == 'districts') {
        // Lấy danh sách quận/huyện
        $provice = $this->proviceRepository->findById($get['data']['location_id'], ['code', 'name'], ['districts']);
        $html = $this->renderHtml($provice->districts, '[Chọn quận/huyện]');
    } else if($get['target'] == 'wards') {
        // Lấy danh sách phường/xã
        $district = $this->districtRepository->findById($get['data']['location_id'], ['code', 'name'], ['wards']);
        $html = $this->renderHtml($district->wards, '[Chọn phường/xã]');
    }

    return response()->json([
        'html' => $html,
    ]);
}

public function renderHtml($locations, $root = 'Chọn khu vực')
{
    $html = '<option value="0">' . $root . '</option>';
    foreach($locations as $location) {
        $html .= '<option value="' . htmlspecialchars($location['code']) . '">' . htmlspecialchars($location['name']) . '</option>';
    }
    return $html;
}

}