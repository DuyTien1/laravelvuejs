<template>
    <form @submit.prevent="createCategory()">
        <a-card title="Tạo Mới Danh Mục" style="width: 100%; text-align: center;">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <category_name>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.category_name }">Tên Danh Mục: </span>
                            </category_name>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input placeholder="Tên Danh Mục" allow-clear v-model:value="category_name"
                                :class="{ 'input-danger': errors.category_name }" />
                            <div class="w-100"></div>
                            <small v-if="errors.category_name" class="text-danger">{{ errors.category_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <category_name>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.describe }">Mô Tả Danh Mục: </span>
                            </category_name>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-textarea placeholder="Mô Tả Danh Mục" allow-clear auto-size v-model:value="describe"
                                :class="{ 'input-danger': errors.describe }" />
                            <div class="w-100"></div>
                            <small v-if="errors.describe" class="text-danger">{{ errors.describe[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row m-4">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-center mx-auto">
                    <a-button class="me-0 me-sm-2 mb-2 mb-sm-0">
                        <router-link :to="{ name: 'admin-categories' }">
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

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-category"]);

        const routers = useRouter();
        const errors = ref([]);
        const category = reactive({
            category_name: '',
            describe: ''
        });

        const filterOption = (input, option) => {
            return option.category_name.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createCategory = () => {
            axios.post("http://localhost:8000/api/category", category)
                .then((response) => {
                    if (response) {
                        message.success("Tạo Danh Mục Mới Thành Công");
                        routers.push({ name: "admin-categories" });
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                    console.log(error);
                });
        };

        return {
            filterOption,
            createCategory,
            ...toRefs(category),
            errors
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
}</style>