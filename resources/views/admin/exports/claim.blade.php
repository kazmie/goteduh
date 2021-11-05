<p></p>
<p></p>
<h3>
    Gabungan Baiduri Sdn Bhd
</h3>
<h4>
    List of Claim
</h4>

<p></p>
<table>
    <thead>
        <tr>
            <th style="background-color: #000000;color:#ffffff;">#</th>
            <th style="background-color: #000000;color:#ffffff;">Main Participant Fullname</th>
            <th style="background-color: #000000;color:#ffffff;">NRIC</th>
            <th style="background-color: #000000;color:#ffffff;">Period of Coverage (Start)</th>
            <th style="background-color: #000000;color:#ffffff;">Period of Coverage (End)</th>
            <th style="background-color: #000000;color:#ffffff;">Notification Date</th>
            <th style="background-color: #000000;color:#ffffff;">Accident Date</th>
            <th style="background-color: #000000;color:#ffffff;">Claim Type</th>
            <th style="background-color: #000000;color:#ffffff;">Status</th>
            <th style="background-color: #000000;color:#ffffff;">Claim Paid Amount (RM)</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        @foreach($claims as $item)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $item->InsuranceEnrollment->user->name }}</td>
            <td>{{ $item->InsuranceEnrollment->user->nric }}</td>
            <td>{{ $item->InsuranceEnrollment->depart_date }}</td>
            <td>{{ $item->InsuranceEnrollment->return_date }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->accident_date }}</td>
            <td>{{ $item->ClaimType->name }}</td>
            <td>
                @if($item->status == 2)
                APPROVED
                @else
                PENDING
                @endif
            </td>
            <td>{{ $item->amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
