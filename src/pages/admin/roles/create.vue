<template>
    <form @submit.prevent="createRoles()">
        <a-card title="Tạo Mới Tác Giả" style="width: 100%; text-align: center;">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.role_name }">Tên Vai Trò: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div>
                                <ckeditor :editor="editor" :value="role_name" v-model="role_name" :config="editorConfig"></ckeditor>
                            </div>
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
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js"
import { defineComponent, ref, reactive, toRefs } from "vue";
import axios from "axios";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-roles"]);
        const routers = useRouter();
        const errors = ref([]);
        const roles = reactive({
            role_name: '',
        });

        const filterOption = (input, option) => {
            return option.role_name.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createRoles = () => {
            axios.post("http://localhost:8000/api/role", roles)
                .then((response) => {
                    if (response) {
                        message.success("Tạo tác Giả Mới Thành Công");
                        routers.push({ name: "admin-roles" });
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                    console.log(error);
                });
        };

        return {
            filterOption,
            createRoles,
            ...toRefs(roles),
            errors,
            editor: ClassicEditor,
            editorConfig: {
                toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|', 'headings', '|', 'undo', 'redo'],
                heading: {
                    options: [
                        { model: 'normal', view: 'span', title: 'normal' }
                    ]
                }
            }
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