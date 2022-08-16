<x-auth-layout title="Account Deletion">
    <form method="POST" action="delete-account/{{ auth()->user()->id }}" class="p-8">

        @csrf
        @method('DELETE')

        <p class="text-white opacity-40 text-md">Are you sure you want to delete your account? <br> This action is permanent and cannot be undone. <br> Your confessions will be deleted as well.</p>

        <button type="submit"
                class="w-max mt-7 rounded border-t border-red-700 bg-red-500 py-3 px-4 font-medium text-white duration-150">
                Reset Password
        </button>
    </form>
</x-auth-layout>
