let getters = {

    resources: state => {
        return state.resources
    },

    tasks: state => {
        return state.tasks
    },

    departments: state => {
        return state.departments
    },

    user: state => {
        return state.user
    },

    departmentsUsers: state => {
        return state.departmentsUsers
    },

    userProjectsCount: state => {
        return state.userProjectsCount
    },

    userResourcesCount: state => {
        return state.userResourcesCount
    },

    userCustomersCount: state => {
        return state.userCustomersCount
    },

    userEquipmentCount: state => {
        return state.userEquipmentCount
    },

    primaryColorSimple: state => {
        return state.primaryColorSimple
    },
    secondaryColorSimple: state => {
        return state.secondaryColorSimple
    },
    primaryColorHex: state => {
        return state.primaryColorHex
    },
    secondaryColorHex: state => {
        return state.secondaryColorHex
    }
}

export default  getters
