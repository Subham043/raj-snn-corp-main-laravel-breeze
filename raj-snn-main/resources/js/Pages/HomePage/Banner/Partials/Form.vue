<script setup>

import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Form/PrimaryButton.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import TextInput from '@/Components/Form/TextInput.vue';

defineEmits(['submit-handler', 'image-handler'])

defineProps({
    form: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Banner Information</h4>
        </div><!-- end card header -->

        <form @submit.prevent="$emit('submit-handler')">
            <div class="card-body">
                <div class="live-preview">
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <InputLabel for="title" value="Title" />

                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"

                                autofocus
                                autocomplete="title"
                            />

                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <InputLabel for="image" value="Image" />

                            <div class="mt-1 block w-full">
                                <input
                                    class="form-control"
                                    type="file"
                                    @input="$emit('image-handler', $event.target.files[0])"
                                />
                            </div>

                            <InputError class="mt-2" :message="form.errors.image" />
                        </div>
                        <div class="col-xxl-12 col-md-12">
                            <InputLabel for="sub_title" value="Sub-Title" />

                            <TextArea
                                id="email"
                                class="mt-1 block w-full"
                                v-model="form.sub_title"

                            />

                            <InputError class="mt-2" :message="form.errors.sub_title" />
                        </div>

                        <div class="col-xxl-2 col-lg-2 col-md-4 col-sm-12">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                        </div>
                        <div class="col-xxl-12 col-md-12">
                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
