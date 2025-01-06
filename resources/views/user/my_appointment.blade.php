@extends('layouts.app')

@section('content')
    <!-- Search Form -->
    <form method="GET" action="{{ route('appointments.index') }}" class="px-20 pt-32 flex justify-start">
        <input type="text" name="search" class="px-4 py-2 border-gray-300 rounded-full" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit" class="ml-2 px-4 py-2 rounded-full bg-orange-950 text-white">Search</button>
    </form>

    <div class="flex justify-center items-start px-20 pt-5 mb-32">
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg w-full">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('appointments.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-blue-600">Name</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('appointments.index', array_merge(request()->query(), ['sort' => 'service', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-blue-600">Service</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('appointments.index', array_merge(request()->query(), ['sort' => 'date', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-blue-600">Date/Time</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cancelled At
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cancellation Reason
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $appointment->name }}
                                    </div>
                                    <span class="text-sm text-gray-500">
                                        {{ $appointment->email }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $appointment->service }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($appointment->date . ' ' . $appointment->time)->format('Y-m-d H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $appointment->phone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ 
                                    $appointment->status === 'cancelled' ? 'bg-red-100 text-red-600' : 
                                    ($appointment->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') 
                                }}">
                                {{ $appointment->status === 'cancelled' ? 'Cancelled' : 
                                   ($appointment->status === 'approved' ? 'Approved' : 'Pending') 
                                }}
                            </span>
                        </td>                            
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            @if ($appointment->status !== 'cancelled')
                                <button onclick="confirmCancel({{ $appointment->id }})" class="ml-2 text-red-600 hover:text-red-900">Cancel</button>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($appointment->status === 'cancelled')
                                {{ \Carbon\Carbon::parse($appointment->updated_at)->format('Y-m-d H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($appointment->status === 'cancelled')
                                {{ $appointment->cancellation_reason }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination Links --}}
            <div class="py-4 px-6">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>

    @if (session()->has('notification'))
        @php $notification = session('notification'); @endphp
        <x-notification :type="$notification['type']" :message="$notification['message']" />
    @endif

    <script>
        function confirmCancel(id) {
            if (confirm('Are you sure you want to cancel this appointment?')) {
                document.getElementById('cancel-form-' + id).submit();
            }
        }
    </script>

    @foreach ($appointments as $appointment)
    <form id="cancel-form-{{ $appointment->id }}" action="{{ route('appointments.cancel', $appointment->id) }}" method="POST" style="display: none;">
        @csrf
        @method('POST')
    </form>
    @endforeach

@endsection
