<template>
    <div :class="{'block': show, 'hidden': ! show}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')">
                Dashboard
            </ResponsiveNavLink>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div>
                    <div class="font-medium text-base text-gray-800">
                        {{ name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ email }}
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                    Profile
                </ResponsiveNavLink>

                <!-- Authentication -->
                <form method="POST" @submit.prevent="logout">
                    <ResponsiveNavLink as="button">
                        Log Out
                    </ResponsiveNavLink>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ResponsiveNavLink from '@/Components/Admin/ResponsiveNavLink.vue';
// import route from '../../../../../vendor/tightenco/ziggy/src/js/route';
defineProps<{
    logout: Function,
    email: string,
    name: string,
    show: boolean
    nav: any
}>()
</script>

<style scoped>

</style>
