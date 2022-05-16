let mutations = {

    /**
     * Jellyplot Departments
     * @param state
     * @param departments
     * @return {*}
     * @constructor
     */
    FETCH_DEPARTMENTS(state, departments)
    {
        return state.departments = departments
    },

    /**
     * Jellyplot Resources By Department
     * @param state
     * @param resources
     * @return {*}
     * @constructor
     */
    FETCH_RESOURCES(state, resources)
    {
        return state.resources = resources
    },

    /**
     * Jellyplot Tasks By Department
     * @param state
     * @param tasks
     * @return {*}
     * @constructor
     */
    FETCH_TASKS(state, tasks)
    {
        return state.tasks = tasks
    },

    /**
     *
     * @param state
     * @param departmentsUsers
     * @return {*}
     * @constructor
     */
    FETCH_DEPARTMENTS_USERS(state, departmentsUsers)
    {
        return state.departmentsUsers = departmentsUsers
    },


    /**
     *
     * @param state
     * @param userContributionProjectsCount
     * @return {*}
     * @constructor
     */
    FETCH_USER_CONTRIBUTION_PROJECTS_COUNT(state, userContributionProjectsCount)
    {
        return state.userContributionProjectsCount = userContributionProjectsCount
    },


    /**
     *
     * @param state
     * @param userContributionResourcesCount
     * @return {*}
     * @constructor
     */
    FETCH_USER_CONTRIBUTION_RESOURCES_COUNT(state, userContributionResourcesCount)
    {
        return state.userContributionResourcesCount = userContributionResourcesCount
    },


    /**
     *
     * @param state
     * @param userContributionCustomersCount
     * @return {*}
     * @constructor
     */
    FETCH_USER_CONTRIBUTION_CUSTOMERS_COUNT(state, userContributionCustomersCount)
    {
        return state.userContributionCustomersCount = userContributionCustomersCount
    },

    /**
     *
     * @param state
     * @param userContributionEquipmentCount
     * @return {*}
     * @constructor
     */
    FETCH_USER_CONTRIBUTION_EQUIPMENT_COUNT(state, userContributionEquipmentCount)
    {
        return state.userContributionEquipmentCount = userContributionEquipmentCount
    },

    /**
     *
     * @param state
     * @param primaryColorSimple
     * @return {*}
     * @constructor
     */
    FETCH_COLORS_PRIMARY_SIMPLE(state, primaryColorSimple)
    {
        return state.primaryColorSimple = primaryColorSimple
    },

    /**
     *
     * @param state
     * @param secondaryColorSimple
     * @return {*}
     * @constructor
     */
    FETCH_COLORS_SECONDARY_SIMPLE(state, secondaryColorSimple)
    {
        return state.secondaryColorSimple = secondaryColorSimple
    },
    /**
     *
     * @param state
     * @param primaryColorHex
     * @return {*}
     * @constructor
     */
    FETCH_COLORS_PRIMARY_HEX(state, primaryColorHex)
    {
        return state.primaryColorHex = primaryColorHex
    },

    /**
     *
     * @param state
     * @param secondaryColorHex
     * @return {*}
     * @constructor
     */
    FETCH_COLORS_SECONDARY_HEX(state, secondaryColorHex)
    {
        return state.secondaryColorHex = secondaryColorHex
    },


    DELETE_POST(state, post) {
        let index = state.users.findIndex(item => item.id === post.id)
        state.users.splice(index, 1)
    }

}
export default mutations
