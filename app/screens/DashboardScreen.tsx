// DashboardScreen
import React from "react";
import { View, Text, StyleSheet, Button, ScrollView, ImageBackground } from "react-native";
import { useNavigation } from "@react-navigation/native";
import { Colors } from "@/constants/Colors";
import { FaArrowLeft, FaArrowRight } from "react-icons/fa";
import Breadcrumb from "../components/Breadcrumb";
import Images from "@/constants/Images";

const DashboardScreen = () => {
  const navigation = useNavigation();
  return (
    <ImageBackground
      source={Images.bodyBG}
      resizeMode="cover"
      style={{
        backgroundColor: Colors.bodyBg,
        flex: 1,
        height: "100%",
        overflow: "hidden",
      }}
      imageStyle={{ opacity: .1 }}
    >
    <ScrollView>
    <View style={styles.container}>
      {/* Breadcrumb */}
      <Breadcrumb />
      {/* Cards */}
      <View style={styles.row}>
        <View style={styles.col}>
          <View style={styles.card}>
            <Text style={styles.title}>Servicings</Text>
            <View style={styles.cardContent}>
              <Text style={styles.icon}>🔧</Text>
              <Text style={styles.value}>2,659</Text>
            </View>
          </View>
        </View>
        <View style={styles.col}>
          <View style={styles.card}>
            <Text style={styles.title}>Contributions</Text>
            <View style={styles.cardContent}>
              <Text style={styles.icon}>💰</Text>
              <Text style={styles.value}>$1,596.5</Text>
            </View>
          </View>
        </View>
      </View>



      
    </View>
    </ScrollView>
    </ImageBackground>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    padding: 20,
  },
  row: {
    display: "flex",
    flexDirection: "row",
    flexWrap: "wrap",
    justifyContent: "space-between",
    alignItems: "center",
    gap: 10,
    width: "100%",
  },
  col: {
    width: "48%",
  },
  card: {
    backgroundColor: Colors.blackRgb,
    borderColor: Colors.borderColor,
    borderWidth: 1,
    padding: 20,
    borderRadius: 10,
    elevation: 5,
  },
  title: {
    color: Colors.emphasisColor,
    fontSize: 18,
    fontWeight: "bold",
  },
  cardContent: {
    display: "flex",
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    marginTop: 10,
  },
  icon: {
    fontSize: 25,
    padding:0,
    margin:0,
  },
  value: {
    fontSize: 20,
    fontWeight: "bold",
    color: Colors.bodyColor,
  },

});

export default DashboardScreen;
