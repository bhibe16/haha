
<h1>Edit Employment History for {{ $employee->First_name }} {{ $employee->Last_name }}</h1>

<form action="{{ route('employee.history.update', [$employee->id, $history->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="job_title">Job Title</label>
    <input type="text" name="job_title" value="{{ $history->job_title }}">
    
    <label for="company_name">Company Name</label>
    <input type="text" name="company_name" value="{{ $history->company_name }}">
    
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" value="{{ $history->start_date }}">
    
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" value="{{ $history->end_date }}">
    
    <button type="submit">Update History</button>
</form>

<a href="{{ route('employee.history.index', $employee->id) }}">Back to History</a>
