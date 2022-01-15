<template>
    <main-layout title="La mia libreria">

        <div class="q-pa-md row">
            <div class="col">
                <q-card class="my-card">
                    <q-card-section>
                        Lipsum
                    </q-card-section>
                </q-card>
            </div>
        </div>
    </main-layout>
</template>

<script>
import {defineComponent} from 'vue'
import MainLayout from '@/Layouts/MainLayout.vue'

export default defineComponent({
    components: {
        MainLayout,
    },
})
</script>
