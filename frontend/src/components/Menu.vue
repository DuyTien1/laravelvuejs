<template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span><i class="fa-solid fa-user"></i> Quản Lý Tài Khoản</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-authors">
            <router-link :to="{ name: 'admin-authors' }">
                <span><i class="fa-solid fa-user"></i> Quản Lý Tác Giả</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-stories">
            <router-link :to="{ name: 'admin-stories' }">
                <span><i class="fa-solid fa-user"></i> Quản Lý Truyện</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-chapters">
            <router-link :to="{ name: 'admin-chapters' }">
                <span><i class="fa-solid fa-user"></i> Quản Lý Chương</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-categories">
            <router-link :to="{ name: 'admin-categories' }">
                <span><i class="fa-solid fa-user"></i> Quản Lý Danh Mục Truyện</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span><i class="fa-solid fa-address-card"></i> Quản Lý Vai Trò</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span><i class="fa-solid fa-gear"></i> Cài Đặt</span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>

<script>
import { defineComponent } from 'vue';
import { useMenu } from "../stores/use-menu.js"
import { storeToRefs } from 'pinia'
export default defineComponent({
    setup() {
        const store = useMenu();
        return {
            ...storeToRefs(store)
        };
    },
});
</script>