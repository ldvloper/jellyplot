<!--
  - Jellyplot Copyright (c) 2022-2022.
  -->

<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-emerald-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                              Add New Task
                            </h3>
                            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                       Title <span class="text-red-700">*</span>
                                    </label>
                                    <input v-model="task.title" type="text" name="title" id="title"
                                           class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                           placeholder="Title">
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-3">
                                    <div>
                                        <label for="startDate" class="block text-sm font-medium text-gray-700">
                                            Start Date <span class="text-red-700">*</span>
                                        </label>
                                        <input v-model="task.start" type="date" name="startDate" id="startDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="endDate" class="block text-sm font-medium text-gray-700">
                                            End Date <span class="text-red-700">*</span>
                                        </label>
                                        <input v-model="task.end" type="date" name="endDate" id="endDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="shift" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                          Shift Schedule <span class="text-red-700">*</span>
                                        </label>
                                        <select v-model="task.shift_id" class="w-full mt-1 text-gray-800 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                                            <option disabled selected>Please Choose a Shift</option>
                                            <option value="Example">Example</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Notes
                                    </label>
                                    <div class="mt-1">
                                <textarea v-model="task.notes" id="notes" name="notes" rows="3" class="shadow-sm dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color mt-1 block w-full sm:text-sm border border-gray-300 dark:border-gray-700 rounded-md"
                                          placeholder="Project Notes Here"></textarea>
                                    </div>
                                    <p class="mt-1 md:mt-2 ml-2 text-sm text-gray-500">
                                       If its necessary write tasks notes and comments.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add
                    </button>
                    <button v-on:click="this.closeNewTaskModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NewTaskComponent",
    emits: ['closeNewTaskModal'],
    data: function () {
        return {
            task: {
                title: '',
                notes: '',
                start: '',
                end: '',
                department_id: '',
                team_id: '',
                project_id: '',
                resource_id: '',
                equipment_id: '',
                shift_id: null,
                creator_id: '',
            }
        }
    },
    methods: {
        closeNewTaskModal: function ()
        {
            this.$emit("closeNewTaskModal")
        }
    }
}
</script>

<style scoped>

</style>
