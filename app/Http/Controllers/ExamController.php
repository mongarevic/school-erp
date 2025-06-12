<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\ExamType;
use Illuminate\Http\Request;
use App\Repositories\ExamRepository;
use App\Http\Requests\CreateExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AcademicYear;

class ExamController extends AppBaseController
{
    /** @var ExamRepository $examRepository*/
    private $examRepository;

    public function __construct(ExamRepository $examRepo)
    {
        $this->examRepository = $examRepo;
    }

    private function getDropdownData()
    {
        return [
            'examtypes' => ExamType::pluck('name', 'exam_type_id'),
            'academicYear' => AcademicYear::pluck('name', 'academic_year_id')
        ];
    }
    /**
     * Display a listing of the Exam.
     */
    public function index(Request $request)
    {
        $exams = $this->examRepository->paginate(10);

        return view('exams.index')
            ->with('exams', $exams);
    }

    /**
     * Show the form for creating a new Exam.
     */
    public function create()
    {
        $dropdownData = $this->getDropdownData();
        return view('exams.create', $dropdownData);
    }

    /**
     * Store a newly created Exam in storage.
     */
    public function store(CreateExamRequest $request)
    {
        $input = $request->all();

        $exam = $this->examRepository->create($input);

        Flash::success('Exam saved successfully.');

        return redirect(route('exams.index'));
    }

    /**
     * Display the specified Exam.
     */
    public function show($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        return view('exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified Exam.
     */
    public function edit($id)
    {
        $exam = $this->examRepository->find($id);
        $dropdownData = $this->getDropdownData();

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        return view('exams.edit', array_merge(['exam' => $exam], $dropdownData));
    }

    /**
     * Update the specified Exam in storage.
     */
    public function update($id, UpdateExamRequest $request)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        $exam = $this->examRepository->update($request->all(), $id);

        Flash::success('Exam updated successfully.');

        return redirect(route('exams.index'));
    }

    /**
     * Remove the specified Exam from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        $this->examRepository->delete($id);

        Flash::success('Exam deleted successfully.');

        return redirect(route('exams.index'));
    }
}
