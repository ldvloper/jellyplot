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

    /**
     * Contribution Projects Count
     * @param state
     * @return {[]}
     */
    userContributionProjectsCount: state => {
        return state.userContributionProjectsCount
    },

    /**
     * Contribution Resources Count
     * @param state
     * @return {[]}
     */
    userContributionResourcesCount: state => {
        return state.userContributionResourcesCount
    },

    /**
     * Contribution Customers Count
     * @param state
     * @return {[]}
     */
    userContributionCustomersCount: state => {
        return state.userContributionCustomersCount
    },

    /**
     * Contribution Equipment Count
     * @param state
     * @return {[]}
     */
    userContributionEquipmentCount: state => {
        return state.userContributionEquipmentCount
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
