#include <stdio.h>
#include<math.h>
int a[1000001];
int main()
{
    int t,i,j,n,count;
    scanf("%d",&t);
    for(i=4;i<=1000000;i+=2)
        a[i]=1;
    for(i=3;i<=1002;i+=2)
    {
        if(a[i]==0)
            for(j=i*i;j<=100000;j+=2*i)
                a[j]=1;
    }
    for(i=0;i<t;i++)
    {
        count=0;
        scanf("%d",&n);
        for(j=2;j<=n;j++)
        {
            if(a[j]==0)
                count++;
        }
        printf("%d\n",count);
    }
}
