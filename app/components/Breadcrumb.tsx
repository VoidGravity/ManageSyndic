// Breadcrumb

import React from "react";
import { Pressable, Text, View } from "react-native";
import { Link, useNavigation } from "@react-navigation/native";
import { Colors } from "@/constants/Colors";
import { FaArrowLeft } from "react-icons/fa";
interface BreadcrumbProps {
  goBack?: boolean;
  links: {
    title: string;
    to?: string;
  }[];
}
const Breadcrumb = ({ goBack, links }: BreadcrumbProps) => {
  const navigation = useNavigation();
  return (
    <View
      style={{
        marginBottom: 20,
        display: "flex",
        flexDirection: "row",
        justifyContent: "space-between",
        alignItems: "center",
        width: "100%",
      }}
    >
      {/* Go Back */}

      {goBack && (
        <Pressable onPress={() => navigation.goBack()}>
          <FaArrowLeft
            title="Back"
            style={{
              color: Colors.bodyColor,
              fontSize: 16,
              fontWeight: "bold",
            }}
          />
        </Pressable>
      )}
      {/* Title */}
      <View
        style={{
          display: "flex",
          flexDirection: "row",
          justifyContent: "center",
          alignItems: "center",
          gap: 5,
        }}
      >
        {links &&
          links.map((link, index) => (
            <React.Fragment key={index}>
              {link.to && (
                <Link to={link.to}>
                  <Text
                    style={{
                      color: Colors.bodyColor,
                      fontSize: 16,
                      fontWeight: "bold",
                    }}
                  >
                    {link.title}
                  </Text>
                </Link>
              )}
              {!link.to && (
                <Text
                  style={{
                    color: Colors.bodyColor,
                    fontSize: 16,
                    fontWeight: "bold",
                  }}
                >
                  {link.title}
                </Text>
              )}
              {index !== links.length - 1 && (
                <Text
                  style={{
                    color: Colors.bodyColor,
                    fontSize: 16,
                    fontWeight: "bold",
                  }}
                >
                  /
                </Text>
              )}
            </React.Fragment>
          ))}
      </View>
    </View>
  );
};

export default Breadcrumb;
