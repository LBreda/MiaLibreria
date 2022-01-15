<template>
    <q-toolbar class="text-primary bg-primary text-white">
        <q-btn flat round dense icon="menu"/>
        <q-toolbar-title>
            {{ title }}
        </q-toolbar-title>
        <q-space/>
        <q-btn-dropdown flat :label="$page.props.user.name">
            <q-list>
                <q-item :href="route('profile.show')">
                    <q-item-section>
                        <q-item-label>
                            Profilo
                        </q-item-label>
                    </q-item-section>
                </q-item>
                <form>
                    <q-item clickable @click="logout">
                        <q-item-section>
                            <q-item-label>
                                Logout
                            </q-item-label>
                        </q-item-section>
                    </q-item>
                </form>
            </q-list>
        </q-btn-dropdown>
    </q-toolbar>
    <main>
        <slot></slot>
    </main>
</template>
<script>
import {defineComponent} from 'vue'

export default defineComponent({
    props: {
        title: String,
    },

    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>
