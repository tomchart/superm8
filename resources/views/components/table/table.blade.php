<x-form.label name="{{ $label }}" />
<div class="lg:grid lg:grid-cols-12">
    <div class="col-span-8 mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-600 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-base-100 divide-y divide-gray-600">
                            {{ $slot }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
