<template>
    <form @submit.prevent="editUsers()">
        <a-card title="Cập Nhật Tài Khoản" style="width: 100%; text-align: center;">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-center mb-3">
                            <a-avatar shape="square" :size="200">
                                <template #icon>
                                    <img src="../../../assets/avatar.png" alt="error">
                                </template>
                            </a-avatar>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center">
                            <a-button type="primary">
                                <i class="fa-solid fa-plus me-2"></i>
                                <span>Chọn Ảnh Đại Diện</span>
                            </a-button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Vai Trò: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select show-search placeholder="Vai Trò" style="width: 100%; text-align: start;"
                                :options="roles" :filter-option="filterOption" v-model:value="users.role_id" :class="{ 'select-danger': errors.role_id }">
                            </a-select>
                            <div class="w-100"></div>
                            <small v-if="errors.role_id" class="text-danger">{{ errors.role_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Người Dùng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Tên Người Dùng" allow-clear v-model:value="username" :class="{ 'select-danger': errors.username }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.email }">Email: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input type="email" placeholder="Email" allow-clear v-model:value="email" :class="{ 'select-danger': errors.email }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Địa Chỉ: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Địa Chỉ" allow-clear v-model:value="address"
                            :class="{ 'select-danger': errors.address }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.address" class="text-danger">{{ errors.address[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span >Số Điện Thoại: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Số Điện Thoại" allow-clear v-model:value="phone"
                            :class="{ 'select-danger': errors.phone }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.phone" class="text-danger">{{ errors.phone[0] }}</small>
                        </div>
                    </div>
                    <div class="row m-4">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                        </div>
                        <div class="col-12 col-sm-5 text-sm-start">
                            <a-checkbox v-model:checked="change_password">Thay Đổi Mật Khẩu</a-checkbox>
                        </div>
                    </div>
                    <div class="row mb-3" v-if="change_password == true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span >Mật Khẩu Hiện Tại: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password placeholder="Mật Khẩu" allow-clear v-model:value="current_password" autocomplete="on"
                            :class="{ 'select-danger': errors.current_password }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.current_password" class="text-danger">{{ errors.current_password }}</small>
                        </div>
                    </div>
                    <div class="row mb-3" v-if="change_password == true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span >Mật Khẩu Mới: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password placeholder="Mật Khẩu" allow-clear v-model:value="password" autocomplete="on"
                            :class="{ 'select-danger': errors.password }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3" v-if="change_password == true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Xác Nhận Mật Khẩu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password placeholder="Xác Nhận Mật Khẩu" allow-clear
                                v-model:value="password_confirmation" :class="{ 'select-danger': errors.password }" autocomplete="on"/>
                            <div class="w-100"></div>
                            <small v-if="errors.password" class="text-danger">{{
                                errors.password[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-center mx-auto">
                    <a-button class="me-0 me-sm-2 mb-2 mb-sm-0">
                        <router-link :to="{ name: 'admin-users' }">
                            <span>Hủy</span>
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit">
                        <span>Lưu</span>
                    </a-button>
                </div>
                <div class="col-12">
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
// import { Alert } from "ant-design-vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js"
import { defineComponent, ref, reactive, toRefs } from "vue";
import axios from "axios";

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const routers = useRouter();
        const route = useRoute();
        const roles = ref([]);
        const errors = ref([]);
        const users = reactive({
            username: '',
            email: '',
            password: '',
            password_confirmation: '',
            current_password: '',
            address: '',
            phone: '',
            role_id: [],
            role_name: '',
            change_password: false
        });

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const getRole = () => {
            axios.get('http://localhost:8000/api/role')
                .then((response) => {
                    roles.value = response.data.data;
                    console.log(roles.value);
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                    console.log(error);
                });
        };
        getRole();

        const getUserEdit = () => {
            axios.get('http://localhost:8000/api/user/' + route.params.id)
                .then((response) => {
                    users.username = response.data.data.username;
                    users.email = response.data.data.email;
                    users.address = response.data.data.address;
                    users.phone = response.data.data.phone;
                    users.role_id = response.data.data.role_id;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        getUserEdit();

        const editUsers = () => {
            axios.put('http://localhost:8000/api/user/' + route.params.id, users)
                .then((response) => {
                    if (response) {
                        message.success("Cập Nhật Tài Khoản Thành Công");
                        routers.push({ name: "admin-users" });
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                });
        };

        return {
            roles,
            filterOption,
            editUsers,
            ...toRefs(users),
            errors,
            users
        }
    }
});
</script>


<style>
.select-danger {
    border: 1px solid #ff0000;
}

.input-danger {
    border-color: #ff0000;
}
</style>