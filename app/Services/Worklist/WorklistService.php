<?php

namespace App\Services\Worklist;

use App\Models\Developer;
use App\Models\Issue;

class WorklistService
{
    public function calculate() {
        $issues = Issue::all()->sortByDesc('complexity');
        $developers = Developer::orderByDesc('difficulty')->get()->map(function ($developer) {
            $developer->issues = array();
            $developer->workHour = 0;
            return $developer;
        });

        $latest = 0;

        foreach ($issues as $issue) {
            $developer = $developers->sortBy('workHour')->first();

            $maxWh = $developers->max('workHour');
            foreach ($developers->sortBy('workHour') as $developer2) {
                //echo  "ISSUE ID: $issue->id | USER ID: $developer2->id | Kontrol: ";
                $test = $developer2->workHour + ($issue->complexity / $developer2->difficulty);
                //echo "$test < $maxWh<br>";
                if ($test < $maxWh)
                {
                    //echo "TRUE GELDİ<br>";
                    $developer = $developer2;
                    break;
                }
                if ($test < $latest) {
                    //echo "SECOND GELDİ | $test < $latest<br>";
                    $developer = $developer2;
                    $latest = $test;
                    break;
                }
                $latest = $test;
            }

            //$developer = $developers->sortBy('workHour')->first();
            $developer->workHour += $workHour = ($issue->complexity / $developer->difficulty);

            $issue->workHour = $workHour;
            $developer->issues += [$issue->id => $issue];
            //echo "$issue->id nolu iş (CX: $issue->complexity) İşgücü: $developer->difficulty Gereken Süre $workHour ile $developer->name(#$developer->id) atandı. Toplam Çalışma Süresi $developer->workHour<hr>";
        }

        foreach ($developers as $developer) {
            echo "$developer->name (#$developer->id) için çalışma periyodu:<br>";

            foreach ($developer->issues as $issue) {
                echo "#$issue->id (<b>$issue->workHour h</b>) | ";
            }
            echo "Toplam Çalışma Saati: <b>$developer->workHour h</b><br>";
        }
    }
}
