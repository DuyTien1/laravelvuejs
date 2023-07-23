<template>
    Đây là trang quản lý authors
</template>

<script> 
import { useMenu } from "../../../stores/use-menu.js"
export default {
    setup() {
        useMenu().onSelectedKeys(["admin-comments"]);
    }
}
</script>