// DashboardScreen
import React, { useEffect } from "react";
import {
  View,
  Text,
  StyleSheet,
  ScrollView,
  ImageBackground,
} from "react-native";
import { Link } from "@react-navigation/native";
import { Colors } from "@/constants/Colors";
import Breadcrumb from "../components/Breadcrumb";
import Images from "@/constants/Images";
import env from "@/constants/env";
import AsyncStorage from "@react-native-async-storage/async-storage";

const DashboardScreen = () => {
  const [contributions, setContributions] = React.useState([1, 2, 3]);
  const [contributionsCount, setContributionsCount] = React.useState("0");
  const [servicingsCount, setServicingsCount] = React.useState("0");
  const [user, setUser] = React.useState({});

  useEffect(() => {
    async function fetchData() {
      const token = await AsyncStorage.getItem("token");
      console.log('token',token);
      // fetch contributions
      fetch(env.API_URL + "/dashboard", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${token}`,
        },
      })
        .then((response) => response.json())
        .then((json) => {
          setContributionsCount(json.contributions);
          setServicingsCount(json.servicings);
          setContributions(json.LastContributions);
        })
        .catch((error) => console.error(error));
    }
    fetchData();
  }, []);

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
      imageStyle={{ opacity: 0.1 }}
    >
      <ScrollView>
        <View style={styles.container}>
          {/* Breadcrumb */}
          <Breadcrumb
            links={[
              {
                title: "Dashboard",
              },
            ]}
          />
          {/* Cards */}
          <View style={styles.row}>
            <Link to={"/Servicing"} style={styles.col}>
              <View style={{ width: "100%" }}>
                <View style={styles.card}>
                  <Text style={styles.title}>Servicings</Text>
                  <View style={styles.cardContent}>
                    <Text style={styles.icon}>🔧</Text>
                    <Text style={styles.value}>{servicingsCount}</Text>
                  </View>
                </View>
              </View>
            </Link>
            <Link to={"/Contibution"} style={styles.col}>
              <View style={{ width: "100%" }}>
                <View style={styles.card}>
                  <Text style={styles.title}>Contributions</Text>
                  <View style={styles.cardContent}>
                    <Text style={styles.icon}>💰</Text>
                    <Text style={styles.value}>{contributionsCount}</Text>
                  </View>
                </View>
              </View>
            </Link>
          </View>
          {/* Title */}
          <Text
            style={{
              color: Colors.bodyColor,
              fontSize: 20,
              fontWeight: "bold",
              marginTop: 20,
              width: "100%",
              marginBottom: 20,
            }}
          >
            My last Contributions
          </Text>
          {contributions.map((item: any, index) => (
            <View
              key={index}
              style={{
                width: "100%",
                borderWidth: 1,
                borderColor: Colors.borderColor,
                padding: 10,
                borderRadius: 10,
                marginBottom: 20,
              }}
            >
              <View
                style={{
                  display: "flex",
                  flexDirection: "row",
                  justifyContent: "space-between",
                  alignItems: "center",
                  paddingBottom: 10,
                }}
              >
                <Text style={{ fontWeight: "bold", color: Colors.bodyColor }}>
                  Price
                </Text>
                <Text style={{ color: Colors.bodyColor }}>{item.price}</Text>
              </View>
              <View
                style={{
                  display: "flex",
                  flexDirection: "row",
                  justifyContent: "space-between",
                  alignItems: "center",
                  paddingBottom: 10,
                }}
              >
                <Text style={{ fontWeight: "bold", color: Colors.bodyColor }}>
                  Date
                </Text>
                <Text style={{ color: Colors.bodyColor }}>{item.date}</Text>
              </View>
            </View>
          ))}
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
  th: {
    width: "auto",
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
    padding: 0,
    margin: 0,
  },
  value: {
    fontSize: 20,
    fontWeight: "bold",
    color: Colors.bodyColor,
  },
});

export default DashboardScreen;
