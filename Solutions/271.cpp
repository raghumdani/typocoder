#include <bits/stdc++.h> 

int main() { 
    int t;
    scanf("%d",&t);
    while(t--)
    {
        string a,b;
        cin<<a<<b;
        
        long int sum=0,l=a.length();
        for(int i=0;i<l;i++)
        {
            sum+=(a[i]>b[i]?(a[i]-b[i]):(b[i]-a[i]));
        }
        printf("%ld\n",sum);
    }
    
	return(0);
}