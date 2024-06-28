import { Colors } from "@/constants/Colors";
import Images from "@/constants/Images";
import { Link } from "@react-navigation/native";
import React from "react";
import { FaBars } from "react-icons/fa6";
import { Image, View } from "react-native";

const Header = ({ avatar, navigation }: any) => {
  // close drawer
  const openDrawer = () => {
    navigation.openDrawer();
  };

  return (
    <React.Fragment>
      <View style={styles.screen}>
        <View style={styles.header}>
          <View>
            {/* Menu toggle */}
            <FaBars onClick={openDrawer} style={styles.menuToggle} size={30} />
          </View>
          <View>
            {/* Logo */}
            <Link to={'/Dashboard'}>
              <Image style={styles.logo} source={Images.Logo} />
            </Link>
          </View>
          <View>
            {/* User photo */}
            <Link to="/Profile">
              <Image style={styles.userPhoto} source={avatar} />
            </Link>
          </View>
        </View>
      </View>
    </React.Fragment>
  );
};

const styles: any = {
  screen: {
    backgroundColor: Colors.bodyBg,
    width: "100%",
    height: "100%",
  },
  logo: {
    width: 50,
    height: 60,
    maxHeight: "80%",
  },
  header: {
    backgroundColor: Colors.emphasisColor,
    color: "white",
    padding: 10,
    textAlign: "center",
    with: "100%",
    display: "flex",
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    height: 70,
    boxShadow: "0 0 10px rgba(0, 0, 0, 0.1)",
  },
  menuToggle: {
    color: "#0c0c0c",
  },
  userPhoto: {
    width: 45,
    height: 45,
    borderRadius: 30,
    backgroundColor: "#f5f5f5",
    overflow: "hidden",
    maxHeight: "80%",
  },
};

export default Header;
