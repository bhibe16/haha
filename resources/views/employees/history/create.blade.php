<h1>Add Employment History for {{ $employee->First_name }} {{ $employee->Last_name }}</h1>

<form action="{{ route('employee.history.store', $employee->id) }}" method="POST">
    @csrf
    <label for="job_title">Job Title</label>
    <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" required>
    
    <label for="company_name">Company Name</label>
    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required>
    
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
    
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
    
    <button type="submit">Add History</button>
</form>

<a href="{{ route('employee.history.index', $employee->id) }}">Back to History</a>
