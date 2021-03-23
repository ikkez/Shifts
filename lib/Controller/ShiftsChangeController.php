<?php


namespace OCA\Shifts\Controller;

use OCA\Shifts\AppInfo\Application;
use OCA\Shifts\Service\ShiftsChangeService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class ShiftsChangeController extends Controller{
	/** @var ShiftsChangeService */
	private $service;

	/** @var string */
	private $userId;

	use Errors;


	public function __construct(IRequest $request, ShiftsChangeService $service, $userId){
		parent::__construct(Application::APP_ID, $request);
		$this->service = $service;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index(): DataResponse {
		return new DataResponse($this->service->findAll());
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param int $id
	 * @return DataResponse
	 */
	public function show(int $id): DataResponse {
		return $this->handleNotFound(function () use($id){
			return $this->service->find($id);
		});
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param string oldAnalystId
	 * @param string newAnalystId
	 * @param bool $adminApproval
	 * @param string $adminApprovalDate
	 * @param bool $analystApproval
	 * @param string $analystApprovalDate
	 * @param int $oldShiftsId
	 * @param int $newShiftsId
	 * @param string desc
	 * @param int type
	 * @return DataResponse
	 */
	public function create(string $oldAnalystId, string $newAnalystId, bool $adminApproval, string $adminApprovalDate, bool $analystApproval, string $analystApprovalDate, int $oldShiftsId, int $newShiftsId, string $desc, int $type): DataResponse {
		return new DataResponse($this->service->create($oldAnalystId, $newAnalystId, $adminApproval, $adminApprovalDate, $analystApproval, $analystApprovalDate, $oldShiftsId, $newShiftsId, $desc, $type));
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param int $id
	 * @param string oldAnalystId
	 * @param string newAnalystId
	 * @param bool $adminApproval
	 * @param string $adminApprovalDate
	 * @param bool $analystApproval
	 * @param string $analystApprovalDate
	 * @param int $oldShiftsId
	 * @param int $newShiftsId
	 * @param string desc
	 * @param string type
	 * @return DataResponse
	 */
	public function update(int $id,string $oldAnalystId, string $newAnalystId, bool $adminApproval, string $adminApprovalDate, bool $analystApproval, string $analystApprovalDate, int $oldShiftsId, int $newShiftsId, string $desc, string $type): DataResponse
	{
		return $this->handleNotFound(function() use ($id, $oldAnalystId, $newAnalystId, $adminApproval, $adminApprovalDate, $analystApproval, $analystApprovalDate, $oldShiftsId, $newShiftsId, $desc, $type){
			return $this->service->update($id, $oldAnalystId, $newAnalystId, $adminApproval, $adminApprovalDate, $analystApproval, $analystApprovalDate, $oldShiftsId, $newShiftsId, $desc, $type);
		});
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param int $id
	 * @return DataResponse
	 */
	public function destroy(int $id): DataResponse
	{
		return $this->handleNotFound(function() use($id) {
			return $this->service->delete($id);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function getAllByUserId(): DataResponse
	{
		$userId = $this->userId;
		return $this->handleNotFound(function () use($userId){
			return $this->service->findAllByUserId($userId);
		});
	}
}