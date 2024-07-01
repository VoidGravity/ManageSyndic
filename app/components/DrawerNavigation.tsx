import React, { useState } from "react";
import { createDrawerNavigator } from "@react-navigation/drawer";
import { Image, ImageBackground, Text, View } from "react-native";
import DashboardScreen from "../screens/DashboardScreen";
import ServicingScreen from "../screens/ServicingScreen";
import ContibutionScreen from "../screens/ContibutionScreen";
import { Link } from "@react-navigation/native";
import { BiDoorOpen } from "react-icons/bi";
import { AiOutlineClose } from "react-icons/ai";
import { RiDashboardFill } from "react-icons/ri";
import { GrUserWorker } from "react-icons/gr";
import { FaHandsHelping, FaUsers } from "react-icons/fa";
import Images from "@/constants/Images";
import { Colors } from "@/constants/Colors";
import LoginScreen from "../screens/Auth/LoginScreen";
import Header from "./Header";
import ForgotPasswordScreen from "../screens/Auth/ForgotPasswordScreen";
import ResetPasswordScreen from "../screens/Auth/ResetPasswordScreen";

const Drawer = createDrawerNavigator();

const DrawerContent = ({ navigation }: any) => {
  const [user, SetUser] = useState({
    avatar: Images.AvatarMale,
    name: "John Doe",
  });
  return (
    // Profile
    <ImageBackground
      source={Images.bodyBG}
      resizeMode="cover"
      style={styles.image}
      imageStyle={{ opacity: 0.1 }}
    >
      <View
        style={{
          height: 150,
          padding: 10,
          paddingTop: 20,
          backgroundColor: Colors.bodyBg,
          borderBottomColor: Colors.borderColor,
          borderBottomWidth: 1,
          display: "flex",
          flexDirection: "row",
          justifyContent: "space-between",
          position: "relative",
          overflow: "hidden",
        }}
      >
        <Image
          style={{
            zIndex: 0,
            opacity: 0.1,
            width: "100%",
            height: 150,
            position: "absolute",
            top: 0,
            left: 0,
            backgroundColor: Colors.emphasisColor,
          }}
          source={Images.PartialLogo}
        />
        <View>
          <Image
            style={{
              width: 70,
              height: 70,
              borderRadius: 35,
              marginBottom: 10,
              borderWidth: 2,
              borderColor: Colors.bodyColor,
            }}
            source={user.avatar}
          />
          <Text
            style={{
              textAlign: "center",
              fontSize: 20,
              fontWeight: "bold",
              color: Colors.bodyColor,
              textTransform: "capitalize",
            }}
          >
            {user.name}
          </Text>
        </View>
        <View>
          <Text onPress={() => navigation.closeDrawer()}>
            <AiOutlineClose size={30} color={Colors.bodyColor} />
          </Text>
        </View>
      </View>
      <View
        style={{
          flex: 1,
          padding: 10,
          paddingTop: 20,
          borderBottomColor: Colors.bodyColor,
          borderBottomWidth: 1,
        }}
      >
        <Link style={styles.link} to={"/Dashboard"}>
          <RiDashboardFill size={30} style={{ marginRight: 15 }} />
          Dashboard
        </Link>
        {/* <Link style={styles.link} to={"/Syndic"}>
          <FiUsers size={30} style={{ marginRight: 15 }} />
          Syndic
        </Link> */}
        {/* <Link style={styles.link} to={"/Building"}>
          <BiBuildingHouse size={30} style={{ marginRight: 15 }} />
          Building
        </Link> */}
        {/* <Link style={styles.link} to={"/Resident"}>
          <FaUsers size={30} style={{ marginRight: 15 }} />
          Resident
        </Link> */}
        <Link style={styles.link} to={"/Servicing"}>
          <GrUserWorker size={30} style={{ marginRight: 15 }} />
          Servicing
        </Link>
        <Link
          style={{ ...styles.link, borderBottomWidth: 0 }}
          to={"/Contibution"}
        >
          <FaHandsHelping size={30} style={{ marginRight: 15 }} />
          Contibution
        </Link>
      </View>

      <View>
        <Link style={{ ...styles.link, borderBottomWidth: 0 }} to={"/Login"}>
          <BiDoorOpen size={30} style={{ marginRight: 15 }} /> Logout
        </Link>
      </View>
    </ImageBackground>
  );
};

function DrawerNavigation() {
  const [user, SetUser] = useState({
    avatar: Images.AvatarMale,
    name: "John Doe",
  });
  return (
    <Drawer.Navigator
      initialRouteName="Login"
      defaultStatus="closed"
      drawerContent={DrawerContent}
      detachInactiveScreens={true}
      screenOptions={{
        headerShown: true,
        headerStyle: {
          backgroundColor: Colors.bodyBg,
          borderBottomWidth: 1,
          borderBottomColor: Colors.borderColor,
        },
        headerTintColor: "#fff",
        sceneContainerStyle: {
          backgroundColor: "Colors.bodyBg",
        },
        header: ({ navigation, route, options }) => {
          // Hide header on auth routes
          if (
            route.name === "Login" ||
            route.name === "Register" ||
            route.name === "ForgotPassword" ||
            route.name === "ResetPassword"
          ) {
            return null;
          }

          return <Header avatar={user.avatar} navigation={navigation}></Header>;
        },
      }}
    >
      <Drawer.Screen name="Dashboard" component={DashboardScreen} />
      {/* <Drawer.Screen name="Syndic" component={SyndicScreen} /> */}
      {/* <Drawer.Screen name="Building" component={BuildingScreen} /> */}
      {/* <Drawer.Screen name="Resident" component={ResidentScreen} /> */}
      <Drawer.Screen name="Servicing" component={ServicingScreen} />
      <Drawer.Screen name="Contibution" component={ContibutionScreen} />
      <Drawer.Screen name="Login" component={LoginScreen} />
      <Drawer.Screen name="ForgotPassword" component={ForgotPasswordScreen} />
      <Drawer.Screen name="ResetPassword" component={ResetPasswordScreen} />
      {/* <Drawer.Screen name="Profile" component={ProfileScreen} /> */}
    </Drawer.Navigator>
  );
}

const styles: any = {
  link: {
    padding: 10,
    borderBottomWidth: 1,
    borderBottomColor: Colors.borderColor,
    color: Colors.bodyColor,
    marginBottom: 10,
    display: "flex",
    flexDirection: "row",
    alignItems: "center",
  },
  image: {
    backgroundColor: Colors.bodyBg,
    flex: 1,
    height: "100%",
    overflow: "hidden",
  },
};

export default DrawerNavigation;
