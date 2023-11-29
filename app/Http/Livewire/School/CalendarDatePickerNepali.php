<?php

namespace App\Http\Livewire\School;

use Livewire\Component;
use Carbon\Carbon;


class CalendarDatePickerNepali extends Component
{
    public $monthInfo = [
        'Baisakh' => [ '2022-04-14', '2022-05-14', ],
        'Jestha' => [ '2022-05-15', '2022-06-14', ],
        'Asadh' => [ '2022-06-15', '2022-07-16', ],
        'Shrawan' => [ '2022-07-17', '2022-08-16', ],
        'Bhadra' => [ '2022-08-17', '2022-09-16', ],
        'Ashwin' => [ '2022-09-17', '2022-10-17', ],
        'Kartik' => [ '2022-10-18', '2022-11-16', ],
        'Mangsir' => [ '2022-11-17', '2022-12-15', ],
        'Poush' => [ '2022-12-16', '2023-01-14', ],
        'Magh' => [ '2023-01-15', '2023-02-12', ],
        'Falgun' => [ '2023-02-13', '2023-03-14', ],
        'Chaitra' => [ '2023-03-15', '2023-04-13', ],
    ];

    public $monthInfo2080 = [
        'Baisakh' => [ '2023-04-14', '2023-05-14', ],
        'Jestha' => [ '2023-05-15', '2023-06-15', ],
        'Asadh' => [ '2023-06-16', '2023-07-16', ],
        'Shrawan' => [ '2023-07-17', '2023-08-17', ],
        'Bhadra' => [ '2023-08-18', '2023-09-17', ],
        'Ashwin' => [ '2023-09-18', '2023-10-17', ],
        'Kartik' => [ '2023-10-18', '2023-11-16', ],
        'Mangsir' => [ '2023-11-17', '2023-12-16', ],
        'Poush' => [ '2023-12-17', '2024-01-14', ],
        'Magh' => [ '2024-01-15', '2024-02-12', ],
        'Falgun' => [ '2024-02-13', '2024-03-13', ],
        'Chaitra' => [ '2024-03-14', '2024-04-12', ],
    ];

    public $emitDate;

    public $monthBook = array();

    public $sunday = array();
    public $monday = array();
    public $tuesday = array();
    public $wednesday = array();
    public $thursday = array();
    public $friday = array();
    public $saturday = array();

    public $displayMonthName = 'Baisakh';
    public $startDay;
    public $endDay;

    protected $listeners = [
        'dpSelectDate' => 'selectDate',
    ];

    public function render()
    {
        $this->populateMonthBookDayWise();

        return view('livewire.school.calendar-date-picker-nepali');
    }

    public function populateMonthBook()
    {
        $monthStartDate = $this->monthInfo2080[$this->displayMonthName][0];
        $monthEndDate = $this->monthInfo2080[$this->displayMonthName][1];

        $monthStartDay = Carbon::parse($monthStartDate);
        $monthEndDay = Carbon::parse($monthEndDate);

        $this->monthBook = array();

        $day = $monthStartDay->copy();

        for ($i = 0; ; $i++) {
            $this->monthBook[] = [
                'day' => $day->copy(),
            ];

            $day = $day->addDay();

            if ($day > $monthEndDay) {
                break;
            }
        }
    }

    public function populateMonthBookDayWise()
    {
        $monthStartDate = $this->monthInfo2080[$this->displayMonthName][0];
        $monthEndDate = $this->monthInfo2080[$this->displayMonthName][1];

        $monthStartDay = Carbon::parse($monthStartDate);
        $monthEndDay = Carbon::parse($monthEndDate);

        $sunday = [];
        $monday = [];
        $tuesday = [];
        $wednesday = [];
        $thursday = [];
        $friday = [];
        $saturday = [];

        $day = $monthStartDay->copy();

        if ($day->format('l') == 'Saturday') {
            $sunday[] = null;
            $monday[] = null;
            $tuesday[] = null;
            $wednesday[] = null;
            $thursday[] = null;
            $friday[] = null;
        }

        if ($day->format('l') == 'Friday') {
            $sunday[] = null;
            $monday[] = null;
            $tuesday[] = null;
            $wednesday[] = null;
            $thursday[] = null;
        }

        if ($day->format('l') == 'Thursday') {
            $sunday[] = null;
            $monday[] = null;
            $tuesday[] = null;
            $wednesday[] = null;
        }

        if ($day->format('l') == 'Wednesday') {
            $sunday[] = null;
            $monday[] = null;
            $tuesday[] = null;
        }

        if ($day->format('l') == 'Tuesday') {
            $sunday[] = null;
            $monday[] = null;
        }

        if ($day->format('l') == 'Monday') {
            $sunday[] = null;
        }


        for ($i = 0; ; $i++) {

            if ($day->format('l') == 'Sunday') {
                $sunday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Monday') {
                $monday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Tuesday') {
                $tuesday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Wednesday') {
                $wednesday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Thursday') {
                $thursday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Friday') {
                $friday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            if ($day->format('l') == 'Saturday') {
                $saturday[] = [$day->copy(), $i+1, $day->toDateString(),];
            }

            $day = $day->addDay();

            if ($day > $monthEndDay) {
                break;
            }
        }

        $this->sunday = $sunday;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
    }

    public function selectPreviousMonth()
    {
        $monthInfo2080 = array_reverse($this->monthInfo2080, true);

        $flag = false;

        foreach ($monthInfo2080 as $key => $val) {
            if ($flag) {
                $this->displayMonthName = $key;
                break;
            }

            if ($this->displayMonthName == $key) {
                $flag = true;
            }
        }
    }

    public function selectNextMonth()
    {
        $flag = false;

        foreach ($this->monthInfo2080 as $key => $val) {
            if ($flag) {
                $this->displayMonthName = $key;
                break;
            }

            if ($this->displayMonthName == $key) {
                $flag = true;
            }
        }
    }

    public function selectDate($d)
    {
        //$day = json_decode($d);
        $this->emit('dateSelected', $d, $this->displayMonthName, $this->emitDate);
    }

    public function selectMonth($monthName)
    {
        $this->displayMonthName = $monthName;
    }
}
