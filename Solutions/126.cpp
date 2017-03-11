 #include <stdio.h> 

int main() { 
    int t;
    scanf("%d",&t);
    int i;int c=0,j;int n=0;int a[t];int k=0;int count=0;
    for(i=0;i<t;i++)
    {
        scanf("%d",&a[i]);
    }
    for(k=0;k<t;k++)
    {
        if(a[k]==1)
        {
            printf("0");
            continue;
        }
        count=0;;
    for(i=2;i<=a[k];i++)
    {
        c=0;
        
        
        for(j=2;j<=i/2;j++)
        {
            if(c>0)break;
            if(i%j==0)c++;
        }
        if(c==0)count++;
       
    }
        printf("%d",count);
    }
	return(0);
}