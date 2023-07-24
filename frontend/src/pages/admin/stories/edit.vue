<template>
    <form @submit.prevent="editRoles()">
        <a-card title="Cập Nhật Tài Khoản" style="width: 100%; text-align: center;">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-2 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <a-input placeholder="Tên Tác Giả" allow-clear v-model:value="role_name"
                            :class="{ 'select-danger': errors.role_name }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.role_name" class="text-danger">{{ errors.role_name[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-center mx-auto">
                    <a-button class="me-0 me-sm-2 mb-2 mb-sm-0">
                        <router-link :to="{ name: 'admin-roles' }">
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
        useMenu().onSelectedKeys(["admin-roles"]);

        const routers = useRouter();
        const errors = ref([]);
        const route = useRoute();
        const roles = reactive({
            role_name: ''
        });

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const getAuthorEdit = () => {
            axios.get('http://localhost:8000/api/role/' + route.params.id)
                .then((response) => {
                    roles.role_name = response.data.data.role_name;
                    roles.describe = response.data.data.describe;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        getAuthorEdit();

        const editRoles = () => {
            axios.put('http://localhost:8000/api/role/' + route.params.id, roles)
                .then((response) => {
                    if (response) {
                        message.success("Cập Nhật Tác Giả Thành Công");
                        routers.push({ name: "admin-roles" });
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                });
        };

        return {
            filterOption,
            editRoles,
            ...toRefs(roles),
            errors,
            roles
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