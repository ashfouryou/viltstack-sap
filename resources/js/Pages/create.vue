<template>
    <div>
        <h1>Welcome {{ name }}!</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: 'Ashish',
            message: 'How are you?'
        };
    }
};
</script>
