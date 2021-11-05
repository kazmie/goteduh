<p></p>
<p></p>
<h3>
    Gabungan Baiduri Sdn Bhd
</h3>
<h4>
    List of My Ar-Rehlah Certificate
</h4>

<p></p>
<table>
    <thead>
        <tr>
            <th style="background-color: #000000;color:#ffffff;">#</th>
            <th style="background-color: #000000;color:#ffffff;">Policy No</th>
            <th style="background-color: #000000;color:#ffffff;">NRIC</th>
            <th style="background-color: #000000;color:#ffffff;">Main Participant Fullname</th>
            <th style="background-color: #000000;color:#ffffff;">Begin Date</th>
            <th style="background-color: #000000;color:#ffffff;">Return Date</th>
            <th style="background-color: #000000;color:#ffffff;"># of Days</th>
            <th style="background-color: #000000;color:#ffffff;">Area</th>
            <th style="background-color: #000000;color:#ffffff;">Contr. (RM)</th>
            <th style="background-color: #000000;color:#ffffff;">Plan</th>
            <th style="background-color: #000000;color:#ffffff;"> No of Part.</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        
        {!! $total = 0; !!}
        @foreach($enrollments as $item)
        {!! $total += $item->amount; !!}
        <tr> 
            <td>{{ $count++ }}</td>
            <td>{{ $item->policy_no }}</td>
            <td>{{ $item->user->nric }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->depart_date}}</td>
            <td>{{ $item->return_date }}</td>
            <td>{{ $item->noOfDays() }}</td>
            <td>{{ $item->region ?  $item->region->description : '' }}</td>
            <td>{{ number_format($item->amount, 2) }}</td>
            <td>
                @if($item->plan_coverage == 2)
                    FAM
                @else
                    IND
                @endif
            </td>
            <td>{{ $item->headcount() }}</td>
        </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>GRAND TOTAL</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>RM {{ number_format($total,2) }}</strong></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Less 25% COMISSION</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>RM {{ number_format(($total*0.25),2) }}</strong></td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>NETT TOTAL</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>RM {{ number_format(($total - ($total*0.25)),2) }}</strong></td>
        </tr>
    </tbody>
</table>
