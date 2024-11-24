
<h4>Subscription for: {{ $user->name }} {{ $user?->last_name }}({{$user->username}})</h4>
<p>Current Plan: {{ $user->userPlan->title ?? 'No Plan Assigned' }}</p>
<form action="{{route('admin.customer.assign.pricing')}}" method="POST">
    @csrf
    <input type="hidden" name='user_id' value="{{$user->id}}">
    <!-- Dropdown for Subscription Plan -->
    <div class="mb-3">
        <label for="plan_id" class="form-label">Select Pricing <span class="text-danger">*</span></label>
        <select name="plan_id" id="plan_id" class="form-control" required>
            <option value="" disabled selected>Select a plan</option>
            @foreach ($plans as $plan)
                <option value="{{ $plan->id }}">
                    {{ $plan->title }} ({{$plan->frequency == '1' ? 'Monthly' : 'Yearly'}})
                </option>
            @endforeach
        </select>
    </div>
    <div class="text-end">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
