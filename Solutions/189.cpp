#include <stdio.h>
#include<math.h>
int a[100001];
int main()
{
    int t,i,j,n;


    scanf("%d",&t);
    for(i=2;i<=(int)(sqrt(100000));i++)
    {
        if(a[i]==0)
            for(j=i*i;j<=100000;j+=i)
                a[j]=1;
    }
    a[1]=1;a[0]=1;
    for(i=0;i<t;i++)
    {
        scanf("%d",&n);


        if(a[n]==0)
            printf("YES\n");
        else
            printf("NO\n");
    }



	return(0);
}
