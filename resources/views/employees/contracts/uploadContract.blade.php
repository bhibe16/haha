<form action="{{ route('employee.uploadContract', ['id' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 w-1/4">Contract Name:</label>
        <input type="text" name="name" id="name" required class="mt-1 block w-1/3 p-1 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200 text-sm" />
    </div>

    <div class="mb-4">
        <label for="file" class="block text-sm font-medium text-gray-700">Select Contract:</label>
        <input type="file" name="file" id="file" required class="mt-1 block w-full"/>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload Contract</button>
<<<<<<< HEAD
</form>
=======
</form>
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
