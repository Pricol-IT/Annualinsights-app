<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->


    @switch($status)
    @case('submitted')
    <td> <span class="badge bg-primary"> Submitted </span></td>
    @break
    @case('saved')
    <td> <span class="badge bg-warning"> Draft </span></td>
    @break
    @case('approved')
    <td> <span class="badge bg-success"> Approved </span></td>
    @break
    @case('rejected')
    <td> <span class="badge bg-danger"> Rejected </span></td>
    @break

    @default
    <td> <span class="badge bg-secondary"> Not Proceeded </span></td>
    @endswitch
    <td>
        <div class="d-flex gap-1">
            @if ((authUser()->role == 'user'))
            @if ( ($status == 'approved') )
            <span class="badge bg-success"> Added </span>
            @else

            <a href="{{ route($edit, $id) }}" class="btn btn-sm btn-light">
                <i class="bi bi-pencil"></i>
            </a>
            @endif
            @endif


            @if (authUser()->role != 'user')
            @if ( ($status == 'approved') || ($status == 'rejected'))
            <span class="badge bg-success"> Updated </span>
            @elseif(($status == 'not proceeded') || ($status == 'saved') )
            <span class="badge bg-warning"> Waiting </span>
            @else

                <button type="submit" class="btn btn-sm btn-light" name="submit" value="approved">
                    <i class="bi bi-check2"></i>
                </button>
                <button type="submit" class="btn btn-sm btn-light" name="submit" value="rejected">
                    <i class="bi bi-x-lg"></i>
                </button>


            @endif

            @endif
        </div>
    </td>
</div>
