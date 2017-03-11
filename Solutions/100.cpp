#include <stdio.h>
#include <iostream>
#include <string.h>
using namespace std;
int main() { 
    char s[100000];
    int q,i,x,a,b,j,v,sum[100000];
    cin>>s;
    sum[0]=s[0];
    for (i=1;i<strlen(s);i++)
    {
        sum[i]=sum[i-1]+s[i]-48;
    }
   // cout<<sum[0];
    cin>>q;
    for (i=0;i<q;i++)
    {
        cin>>x>>a>>b;
        a--;
        b--;
        if (x==1)
        {
            cin>>v;
            for (j=a;j<=b;j++)
            {
                if (s[j]+v<10)
                {
				s[j]=s[j]+v;
				sum[j]=sum[j-1]+s[j]-48;
				}
                else
                {
				s[j]=(s[j]+v)%10;
				sum[j]=sum[j-1]+s[j]-48;
				}
            }
        }
        else
        {
            if ((sum[b]-sum[a]+s[a]-48)%3==0)
            printf("Yes\n");
            else
            printf("No\n");
        }
    }
	return(0);
}