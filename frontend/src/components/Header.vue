<template>
    <div class="container-fuild top-0">
        <div class="row text-black" style="background-color: rgba(223, 235, 230, 0.87); padding: 1rem;">
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawer"><i class="fa-solid fa-align-justify"></i></span>
            </div>
            <div class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start">
                <img src="../assets/logo.png" alt="logo" height="50" width="60" class="me-3 ms-3">
                <span class="d-none d-sm-flex">TRANG QUẢN TRỊ</span>
            </div>
            <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-center justify-content-sm-end">
                <a-dropdown-button>
                    <router-link :to="{ name:'admin-roles'}">{{ user.username }}</router-link>
                    <template #overlay>
                        <a-menu>
                            <a-menu-item key="1" class="mb-1 mt-1">
                                <router-link :to="{ name:'admin-roles'}">Thông Tin Tài Khoản</router-link>
                            </a-menu-item>
                            <a-menu-item key="2" class="mb-1">
                                <span class="text-danger">Đăng Xuất</span>
                            </a-menu-item>
                        </a-menu>
                    </template>
                    <template #icon>
                        <span><i class="fa-solid fa-user-gear"></i></span>
                    </template>
                </a-dropdown-button>
            </div>
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawerUser"><i class="fa-solid fa-user-gear"></i></span>
            </div>
        </div>
    </div>

    <a-drawer v-model:visible="visible" title="Danh Muc" placement="left">
        <Menu />
    </a-drawer>
    <a-drawer v-model:visible="visible_user" title="Nguoi Dung" placement="right">
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>

<script>

import { defineComponent, ref, toRefs } from 'vue';
import Menu from '../components/Menu.vue';
export default defineComponent({
    components: {
        Menu,
    },

    setup() {
        const visible = ref(false);
        const visible_user = ref(false);
        const user = ref([]);

        const getUser = () => {
            axios.get("http://localhost:8000/api/user/1")
                .then((response) => {
                    user.value = response.data.data;
                    console.log(user.value);
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        getUser();



        const showDrawer = () => {
            visible.value = true;
        };
        const showDrawerUser = () => {
            visible_user.value = true;
        };
        return {
            visible,
            visible_user,
            showDrawer,
            showDrawerUser,
            user,
        };
    },
});

</script>