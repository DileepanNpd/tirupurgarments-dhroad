<template>
    <a-space direction="vertical" align="center">
        <a-qrcode :value="text" :size="100" />
    </a-space>
</template>
<script>
import { ref } from "vue";
export default {
    props: ["text"],
    setup(props) {
        const text = ref("");

        return {
            text: props.text,
        };
    },
};
</script>
